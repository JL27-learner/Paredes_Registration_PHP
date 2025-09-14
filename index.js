  (function () {
      const form = document.getElementById('regForm');
      const toast = document.getElementById('toast');

      const setValidity = (fieldEl, isValid) => {
        fieldEl.classList.toggle('invalid', !isValid);
      };


      form.querySelectorAll('.field').forEach(field => {
        const input = field.querySelector('.control');
        input.addEventListener('blur', () => setValidity(field, input.checkValidity()));
        input.addEventListener('input', () => setValidity(field, input.checkValidity()));
      });

      form.addEventListener('submit', (e) => {
        e.preventDefault();
        let allValid = true;
        form.querySelectorAll('.field').forEach(field => {
          const input = field.querySelector('.control');
          const valid = input.checkValidity();
          setValidity(field, valid);
          if (!valid) allValid = false;
        });

        if (!allValid) {

          const firstInvalid = form.querySelector('.field.invalid .control');
          if (firstInvalid) firstInvalid.focus();
          return;
        }
        document.getElementById("regForm").addEventListener("submit", async function(e) {
  e.preventDefault();

  const formData = new FormData(this);

  const response = await fetch("registration.php", {
    method: "POST",
    body: formData
  });

  const result = await response.json();

  if (result.success) {
    showToast("Registered successfully ✅");
    this.reset();
  } else {
    showToast("Error: " + result.errors.join(", "));
  }
});

function showToast(message) {
  const toast = document.getElementById("toast");
  toast.textContent = message;
  toast.classList.add("show");
  setTimeout(() => toast.classList.remove("show"), 3000);
}


        toast.textContent = 'Registered';
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 2200);


        form.reset();
      });

      form.addEventListener('reset', () => {
        form.querySelectorAll('.field.invalid').forEach(f => f.classList.remove('invalid'));
      });
    })();