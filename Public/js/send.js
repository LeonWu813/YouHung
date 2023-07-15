var btn = document.getElementById("contact-btn");
btn.addEventListener("click", function (e) {
  e.preventDefault();
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var country = document.getElementById("country").value;
  var message = document.getElementById("message").value;
  var body = `Name: ${name} \n Email: ${email} \n Country: ${country} \n Message: ${message} \n `;

  Email.send({
    Host: "smtp.elasticemail.com",
    Username: "leonwuya@gmail.com",
    Password: "pazjllhrfsjrfrxu",
    // Password: "5B9B381EE1658D2E121A04B5753B0C5CC1B7",
    To: "leonwuya@gmail.com",
    From: email,
    Subject: "New form submit from website!",
    Body: body,
  }).then((message) => alert(message));
});
