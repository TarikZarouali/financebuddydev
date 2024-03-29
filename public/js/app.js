// START FORMCHECKING ON REGISTERE
var toastData = localStorage.getItem("toastData");
openToast(toastData);

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
    window.location.href = "http://localhost/financebuddydev/user/login/";

    // Define toast data for success
    const successToastData = {
      title: "Success",
      message: "Registration successful",
      success: true,
    };
    // Call openToast with success toast data

    // Use "js-toast" as the consistent key
    localStorage.setItem("toastData", JSON.stringify(successToastData));
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

    // Define toast data for failure
    const failureToastData = {
      title: "Error",
      message: "There was an error processing your request. Please try again.",
      success: false,
    };
    // Call openToast with failure toast data
    openToast(JSON.stringify(failureToastData));

    // Use "js-toast" as the consistent key
    localStorage.setItem("js-toast", JSON.stringify(failureToastData));
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

  try {
    // Make a POST request using the fetch API
    const ajaxFetch = await fetch(
      "http://localhost/financebuddydev/user/login/",
      {
        method: "POST",
        body: new FormData(form),
      }
    );

    if (!ajaxFetch.ok) {
      throw new Error("Network response was not ok");
    }

    const response = await ajaxFetch.json();

    if (response.success) {
      // Define toast data for success
      const successToastData = {
        title: "Success",
        message: "Successfully logged in",
        success: true,
      };

      // Call openToast with success toast data
      openToast(JSON.stringify(successToastData));

      // Use "js-toast" as the consistent key
      localStorage.setItem("toastData", JSON.stringify(successToastData));

      // Redirect only if successful
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

      // Define toast data for failure
      const failureToastData = {
        title: "Error",
        message:
          "There was an error processing your request. Please try again.",
        success: false,
      };

      // Call openToast with failure toast data
      openToast(JSON.stringify(failureToastData));

      // Use "js-toast" as the consistent key
      localStorage.setItem("js-toast", JSON.stringify(failureToastData));
    }
  } catch (error) {
    console.error("Error during fetch:", error);
    // Handle fetch errors here
  }
}

// CREATE ACCOUNT SECTION
async function createAccount(event) {
  event.preventDefault();

  const form = document.querySelector("form");

  try {
    const ajaxFetch = await fetch(
      "http://localhost/financebuddydev/account/create",
      {
        method: "POST",
        body: new FormData(form),
      }
    );

    if (!ajaxFetch.ok) {
      throw new Error("Network response was not ok");
    }

    const response = await ajaxFetch.json();

    if (response.success) {
      // Show success toast
      const successToastData = {
        title: "Success",
        message: response.success.message,
        success: true,
      };
      window.location.href = "http://localhost/financebuddydev/user/overview/";
      localStorage.setItem("toastData", JSON.stringify(successToastData));
    } else {
      // Show error toast with PHP message
      const failureToastData = {
        title: "Error",
        message: response.message,
        success: false,
      };
      window.location.href = "http://localhost/financebuddydev/user/overview/";
      localStorage.setItem("toastData", JSON.stringify(failureToastData));
    }
  } catch (error) {
    console.error("Error during fetch:", error);
    // Handle fetch errors here
  }
}
// END CREATE ACCOUNT SECTION

// START UPDATE ACCOUNT FUNCTION
async function updateAccount(event, accountId) {
  event.preventDefault();

  const form = document.querySelector("form");

  const ajaxFetch = await fetch(
    `http://localhost/financebuddydev/account/update/${accountId}`,
    {
      method: "POST",
      body: new FormData(form),
    }
  );

  if (!ajaxFetch.ok) {
    throw new Error("Network response was not ok");
  }

  const response = await ajaxFetch.json();

  if (response.status === 200) {
    // Show success toast
    const successToastData = {
      title: "Success!",
      message: response.message,
      success: true,
    };
    window.location.href = "http://localhost/financebuddydev/user/overview/";
    localStorage.setItem("toastData", JSON.stringify(successToastData));
  } else if (response.status === 500) {
    // Show error toast with PHP message
    const failureToastData = {
      title: "Failed",
      message: response.message,
      success: false,
    };
    window.location.href = "http://localhost/financebuddydev/user/overview/";
    localStorage.setItem("toastData", JSON.stringify(failureToastData));
  }
}
// END UPDATE ACCOUNT FUNCTION

// START CREATE GOAL FUNCTION
async function createGoal(event, accountId) {
  event.preventDefault();

  const form = document.querySelector(".js-goal-form");

  try {
    const ajaxFetch = await fetch(
      `http://localhost/financebuddydev/account/createGoal/${accountId}`,
      {
        method: "POST",
        body: new FormData(form),
      }
    );

    if (!ajaxFetch.ok) {
      throw new Error("Network response was not ok");
    }

    const response = await ajaxFetch.json();

    if (response.status === 200) {
      // Show success toast
      const successToastData = {
        title: "Success!",
        message: response.message,
        success: true,
      };
      window.location.href = `http://localhost/financebuddydev/account/overview/${accountId}`;
      localStorage.setItem("toastData", JSON.stringify(successToastData));
    } else if (response.status === 500) {
      // Show error toast with PHP message
      const failureToastData = {
        title: "Failed",
        message: response.message,
        success: false,
      };
      localStorage.setItem("toastData", JSON.stringify(failureToastData));

      var toastData = localStorage.getItem("toastData");
      openToast(toastData);
    }
  } catch (error) {
    console.error("Error during fetch:", error);
    // Handle fetch errors here
  }
}
// END CREATE GOAL FUNCTION

// START UPDATE GOAL FUNCTION
async function updateGoal(event, goalId, accountId) {
  event.preventDefault();

  const form = document.querySelector(".js-update-goal");

  try {
    const ajaxFetch = await fetch(
      `http://localhost/financebuddydev/account/updateGoal/${goalId}`,
      {
        method: "POST",
        body: new FormData(form),
      }
    );

    if (!ajaxFetch.ok) {
      throw new Error("Network response was not ok");
    }

    const response = await ajaxFetch.json();

    if (response.status === 200) {
      // Show success toast
      const successToastData = {
        title: "Success!",
        message: response.message,
        success: true,
      };
      window.location.href = `http://localhost/financebuddydev/account/overview/${accountId}`;
      localStorage.setItem("toastData", JSON.stringify(successToastData));
    } else if (response.status === 500) {
      // Show error toast with PHP message
      const failureToastData = {
        title: "Failed",
        message: response.message,
        success: false,
      };
      localStorage.setItem("toastData", JSON.stringify(failureToastData));
      window.location.href = `http://localhost/financebuddydev/account/overview/${accountId}`;
    }
  } catch (error) {
    console.error("An error occurred:", error.message);
  }
}
// END UPDATE GOAL FUNCTION

// START CREATING TRANSACTION
async function createTransaction(event, accountId) {
  event.preventDefault();

  const form = document.querySelector(".js-transaction-form");

  try {
    const ajaxFetch = await fetch(
      `http://localhost/financebuddydev/account/createTransaction/${accountId}`,
      {
        method: "POST",
        body: new FormData(form),
      }
    );

    if (!ajaxFetch.ok) {
      throw new Error("Network response was not ok");
    }

    const response = await ajaxFetch.json();

    if (response.status === 200) {
      // Show success toast
      const successToastData = {
        title: "Success!",
        message: response.message,
        success: true,
      };
      localStorage.setItem("toastData", JSON.stringify(successToastData));
      window.location.href = `http://localhost/financebuddydev/account/overview/${accountId}`;
    } else if (response.status === 500) {
      // Show error toast with PHP message
      const failureToastData = {
        title: "Failed",
        message: response.message,
        success: false,
      };
      localStorage.setItem("toastData", JSON.stringify(failureToastData));

      // Assuming openToast is a valid function
      var toastData = localStorage.getItem("toastData");
      openToast(toastData);
    }
  } catch (error) {
    console.error("Error during fetch:", error);
    // Handle fetch errors here
  }
}
// END CREATING TRANSACTION

// START UPDATING UPDATE TRANSACTION
async function updateTransaction(event, transactionId, accountId) {
  event.preventDefault();

  const form = document.querySelector("form");

  try {
    const ajaxFetch = await fetch(
      `http://localhost/financebuddydev/account/updateTransaction/${transactionId}`,
      {
        method: "POST",
        body: new FormData(form),
      }
    );

    if (!ajaxFetch.ok) {
      throw new Error("Network response was not ok");
    }

    const response = await ajaxFetch.json();

    if (response.status === 200) {
      // Show success toast
      const successToastData = {
        title: "Success!",
        message: response.message,
        success: true,
      };
      localStorage.setItem("toastData", JSON.stringify(successToastData));
      // Redirect to allTransactions page with the correct accountId
      window.location.href = `http://localhost/financebuddydev/transaction/allTransactions/${accountId}`;
    } else if (response.status === 500) {
      // Show error toast with PHP message
      const failureToastData = {
        title: "Failed",
        message: response.message,
        success: false,
      };
      localStorage.setItem("toastData", JSON.stringify(failureToastData));
      // Redirect to the update page with transactionId
      window.location.href = `http://localhost/financebuddydev/transaction/update/${transactionId}`;
    }
  } catch (error) {
    console.error("Error during fetch:", error);
    // Handle fetch errors here
  }
}
// END UPDATE TRANSACTION

// START CREATING BUDGET
async function createBudget(event, accountId) {
  event.preventDefault();

  const form = document.querySelector(".js-budget-form");

  try {
    const ajaxFetch = await fetch(
      `http://localhost/financebuddydev/account/createBudget/${accountId}`,
      {
        method: "POST",
        body: new FormData(form),
      }
    );

    if (!ajaxFetch.ok) {
      throw new Error("Network response was not ok");
    }

    const response = await ajaxFetch.json();

    if (response.status === 200) {
      // Show success toast
      const successToastData = {
        title: "Success!",
        message: response.message,
        success: true,
      };
      window.location.href = `http://localhost/financebuddydev/account/overview/${accountId}`;
      localStorage.setItem("toastData", JSON.stringify(successToastData));
    } else if (response.status === 500) {
      // Show error toast with PHP message
      const failureToastData = {
        title: "Failed",
        message: response.message,
        success: false,
      };
      localStorage.setItem("toastData", JSON.stringify(failureToastData));

      var toastData = localStorage.getItem("toastData");
      openToast(toastData);
    }
  } catch (error) {
    console.error("Error during fetch:", error);
    // Handle fetch errors here
  }
}
// END CREATING BUDGET

// START UPDATE BUDGET
async function updateBudget(event, budgetId, accountId) {
  event.preventDefault();

  const form = document.querySelector(".js-update-goal");

  try {
    const ajaxFetch = await fetch(
      `http://localhost/financebuddydev/account/updateBudget/${budgetId}`,
      {
        method: "POST",
        body: new FormData(form),
      }
    );

    if (!ajaxFetch.ok) {
      throw new Error("Network response was not ok");
    }

    const response = await ajaxFetch.json();

    if (response.status === 200) {
      // Show success toast
      const successToastData = {
        title: "Success!",
        message: response.message,
        success: true,
      };
      window.location.href = `http://localhost/financebuddydev/account/overview/${accountId}`;
      localStorage.setItem("toastData", JSON.stringify(successToastData));
    } else if (response.status === 500) {
      // Show error toast with PHP message
      const failureToastData = {
        title: "Failed",
        message: response.message,
        success: false,
      };
      localStorage.setItem("toastData", JSON.stringify(failureToastData));
      window.location.href = `http://localhost/financebuddydev/account/overview/${accountId}`;
    }
  } catch (error) {
    console.error("An error occurred:", error.message);
  }
}
// END UPDATE BUDGET

// TOAST HANDLING
function openToast(toastData) {
  // Get the js-toast element
  const jsToastElement = document.querySelector(".js-toast");

  if (jsToastElement && toastData) {
    // Assuming toastData is a stringified JSON stored in localStorage
    const parsedToastData = JSON.parse(toastData);

    // Fix the while loop
    while (jsToastElement.firstChild) {
      jsToastElement.removeChild(jsToastElement.firstChild);
    }

    if (parsedToastData && parsedToastData.success) {
      jsToastElement.innerHTML = `
        <div class="flex items-start justify-between">
          <!-- Success Toast Structure -->
          <div class="toast__icon-wrapper toast__icon-wrapper--success margin-right-xs">
            <svg class="icon" viewBox="0 0 16 16">
              <title>Success</title>
              <g>
                <path d="M6,15a1,1,0,0,1-.707-.293l-5-5A1,1,0,1,1,1.707,8.293L5.86,12.445,14.178.431a1,1,0,1,1,1.644,1.138l-9,13A1,1,0,0,1,6.09,15C6.06,15,6.03,15,6,15Z"></path>
              </g>
            </svg>
          </div>
          <div class="text-component text-sm">
            <h1 class="toast__title text-md">${parsedToastData.title}</h1>
            <p class="toast__p">${parsedToastData.message}</p>
          </div>
          <button class="reset toast__close-btn margin-left-xxxxs js-toast__close-btn js-tab-focus">
            <svg class="icon" viewBox="0 0 12 12">
              <title>Close notification</title>
              <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <line x1="1" y1="1" x2="11" y2="11" />
                <line x1="11" y1="1" x2="1" y2="11" />
              </g>
            </svg>
          </button>
        </div>`;
    } else {
      jsToastElement.innerHTML = `
        <div class="flex items-start justify-between">
          <!-- Warning Toast Structure -->
          <div class="toast__icon-wrapper toast__icon-wrapper--warning margin-right-xs">
            <svg class="icon" viewBox="0 0 16 16">
              <title>Alert</title>
              <path d="M15.8,12.526,9.483.88A1.668,1.668,0,0,0,8.8.2,1.693,1.693,0,0,0,6.516.88L.2,12.526A1.678,1.678,0,0,0,1.686,15H14.314a1.7,1.7,0,0,0,.8-.2,1.673,1.673,0,0,0,.687-2.274ZM8,13a1,1,0,1,1,1-1A1,1,0,0,1,8,13ZM9,9.5a.5.5,0,0,1-.5.5h-1A.5.5,0,0,1,7,9.5v-4A.5.5,0,0,1,7.5,5h1a.5.5,0,0,1,.5.5Z"></path>
            </svg>
          </div>
          <div class="text-component text-sm">
            <h1 class="toast__title text-md">${parsedToastData.title}</h1>
            <p class="toast__p">${parsedToastData.message}</p>
          </div>
          <button class="reset toast__close-btn margin-left-xxxxs js-toast__close-btn js-tab-focus">
            <svg class="icon" viewBox="0 0 12 12">
              <title>Close notification</title>
              <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <line x1="1" y1="1" x2="11" y2="11" />
                <line x1="11" y1="1" x2="1" y2="11" />
              </g>
            </svg>
          </button>
        </div>`;
    }
    var toast = document.querySelector(".js-toast"),
      openToastEvent = new CustomEvent("openToast");

    // open toast
    toast.dispatchEvent(openToastEvent);

    // Use "js-toast" as the consistent key
    localStorage.removeItem("toastData");
  }
}
// END TOAST HANDLING

function handleToastOnCrud(action, isSuccess) {
  let toastData;

  if (isSuccess) {
    // Handle the cases
    switch (action) {
      case "deleteAccount":
        toastData = {
          title: "Successful deleted",
          message: "Account successfully deleted!",
          success: true,
        };
        break;
      case "deleteTransaction":
        toastData = {
          title: "Successful deleted",
          message: "Transaction successfully deleted!",
          success: true,
        };
        break;
      case "deleteGoal":
        toastData = {
          title: "Successful deleted",
          message: "Goal successfully deleted!",
          success: true,
        };
        break;
      case "deleteBudget":
        toastData = {
          title: "Successful deleted",
          message: "Budget successfully deleted!",
          success: true,
        };
        break;

      case "logout":
        toastData = {
          title: "Logged out",
          message: "Successfully logged out",
          success: true,
        };
        break;

      default:
        toastData = {
          title: "Operation Completed",
          message: "Successfully completed",
          success: true,
        };
    }

    // Store toastData in localStorage
    localStorage.setItem("toastData", JSON.stringify(toastData));
  } else {
    // Define toast data for failure
    const failureToastData = {
      title: "Error",
      message: "There was an error processing your request. Please try again.",
      success: false,
    };

    // Call openToast with failure toast data
    openToast(JSON.stringify(failureToastData));

    // Use "js-toast" as the consistent key
    localStorage.setItem("js-toast", JSON.stringify(failureToastData));
  }
}

//ALERT HANDLING
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
