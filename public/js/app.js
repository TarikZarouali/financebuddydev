// START FORMCHECKING ON REGISTERE
async function signUp(event) {
  event.preventDefault();

  const form = document.querySelector("form");

  // Remove existing error messages
  const existingErrors = form.querySelectorAll(".bg-accent");
  existingErrors.forEach((error) => error.remove());

  // Create an object to store the form data
  const formData = new FormData(form);

  // Make a POST request using the fetch API
  const ajaxFetch = await fetch(
    "http://localhost/financebuddydev/user/register/",
    {
      method: "POST",
      body: formData,
    }
  );

  const response = await ajaxFetch.json();

  if (response.success) {
    console.log(response.success.message);
    window.location.href = "http://localhost/financebuddydev/user/login/";
  } else {
    // Loop through the response and append error messages to the corresponding input fields
    Object.keys(response).forEach((fieldName) => {
      const inputField = form.querySelector(`[name="${fieldName}"]`);
      const errorMessage = response[fieldName].message;

      if (inputField) {
        // Create and append error element
        const errorElement = document.createElement("div");
        errorElement.className =
          "bg-accent bg-opacity-20% padding-xs radius-md text-sm color-contrast-higher margin-top-xxs";
        errorElement.textContent = errorMessage;

        // Append error element after the input field
        inputField.parentNode.insertBefore(
          errorElement,
          inputField.nextSibling
        );
      }
    });
  }
}
//END FORMCHECKING ON REGISTER

// START FORM CHECKING ON SIGNIN
async function signIn(event) {
  event.preventDefault();

  const form = document.querySelector("form");

  // Remove existing error messages
  const existingErrors = form.querySelectorAll(".bg-accent");
  existingErrors.forEach((error) => error.remove());

  // Create an object to store the form data
  const formData = new FormData(form);

  // Make a POST request using the fetch API
  const ajaxFetch = await fetch(
    "http://localhost/financebuddydev/user/login/",
    {
      method: "POST",
      body: formData,
    }
  );

  const response = await ajaxFetch.json();

  if (response.success) {
    console.log(response.success.message);
    window.location.href = "http://localhost/financebuddydev/user/overview/";
  } else {
    // Loop through the response and append error messages to the corresponding input fields
    Object.keys(response).forEach((fieldName) => {
      const inputField = form.querySelector(`[name="${fieldName}"]`);
      const errorMessage = response[fieldName].message;
      if (inputField) {
        // Create and append error element
        const errorElement = document.createElement("div");
        errorElement.className =
          "bg-accent bg-opacity-20% padding-xs radius-md text-sm color-contrast-higher margin-top-xxs";
        errorElement.textContent = errorMessage;

        // Append error element after the input field
        inputField.parentNode.insertBefore(
          errorElement,
          inputField.nextSibling
        );
      }
    });
  }
}

// WARNING SHOWING

// File#: _1_alert
// Usage: codyhouse.co/license
(function () {
  var alertClose = document.getElementsByClassName("js-alert__close-btn");
  if (alertClose.length > 0) {
    for (var i = 0; i < alertClose.length; i++) {
      (function (i) {
        initAlertEvent(alertClose[i]);
      })(i);
    }
  }
})();

function initAlertEvent(element) {
  element.addEventListener("click", function (event) {
    event.preventDefault();
    element.closest(".js-alert").classList.remove("alert--is-visible");
  });
}

var budgetPieCharts = document.querySelectorAll(".js-pie-chart");
for (var i = 0; i < budgetPieCharts.length; i++) {
  console.log(budgetPieCharts[i].getElementsByClassName('js-pie-chart__area')[0]);
  new PieChart({
    element: budgetPieCharts[i],
    type: "pie",
    animate: "off",
  });
}
