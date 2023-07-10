const constraints = {
  name: {
    presence: { allowEmpty: false },
  },
  email: {
    presence: { allowEmpty: false },
    email: true,
  },
  country: {
    presence: { allowEmpty: false },
  },
};

const form = document.getElementById("contact-form");

form.addEventListener(
  "submit",
  function (event) {
    const formValues = {
      name: form.elements.name.value,
      email: form.elements.email.value,
      country: form.elements.country.value,
    };

    const errors = validate(formValues, constraints);

    if (errors) {
      event.preventDefault();
      const errorMessage = Object.values(errors)
        .map(function (fieldValues) {
          return fieldValues.join(", ");
        })
        .join("\n");

      alert(errorMessage);
    }
  },
  false
);
