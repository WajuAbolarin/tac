import axios from "axios";
import $ from "jquery";
import select2 from "select2/dist/js/select2";
// import select2 from "./../../public/js/select2.min.js";

window.$ = window.JQuery = $;

const key = process.env.MIX_PAYSTACK_PUBLIC;
let notification = document.querySelector("#notification");
const registerForm = document.forms["register-form"];
const payBtn = document.querySelector("#payBtn");
let paid = false;

const sumbitForm = ref => {
    let form = new FormData(document.querySelector("#register-form"));

    if (ref) {
        form.append("transaction_ref", ref);
    }

    axios
        .post("/register", form, {
            headers: {
                "Content-type": "multipart/form-data"
            }
        })
        .then(({ data: { message, level } }) => {
            registerForm.reset();

            notify({
                message,
                level,
                timeout: 5000
            });
        });
};

function callback(response) {
    if (response.status != "success") {
        return handlefailedPayment(response);
    }
    return handleSuccessfulPayment(response);
}

const notify = ({ message, level = "info", timeout = 5000 }) => {
    notification.innerHTML = "";
    notification.classList.remove(`alert-${level}`);

    notification.classList.add(`alert-${level}`);
    notification.innerHTML = message;
    notification.classList.remove(`d-none`);

    setTimeout(() => {
        notification.classList.add(`d-none`);
        notification.classList.remove(`alert-${level}`);
        notification.innerHTML = "";
    }, timeout);
};

const handleSuccessfulPayment = response => {
    notify({
        message: `Processing ... this may take a minute`,
        level: "info"
    });
    paid = true;
    sumbitForm(response.trxref);
};

const handlefailedPayment = response => {
    notify({
        message: `You payment failed with the following reason: <em>${
            response.message
        }</em>, for any enquires please call <strong> 09028020900</strong>, you may submit your details now and retry payment at another time`,

        level: "danger",
        timeout: 3000
    });
};

const formIsInvalid = () => {
    let form = new FormData(registerForm);
    let fields = [
        "fullname",
        "phone",
        "email",
        "address",
        "assembly",
        "gender",
        "age"
    ];
    let values = fields.map(field => form.get(field));

    return values.some(val => val === "");
};

function payWithPaystack() {
    if (formIsInvalid()) {
        notify({
            message: "Please supply all your details before making payments",
            level: "info"
        });

        return;
    }
    let form = document.forms["register-form"];
    let email, fullname, phone;
    email = form.elements.email.value;
    fullname = form.elements.fullname.value;
    phone = form.elements.phone.value;

    const onClose = () => {
        notify({
            message:
                "we noticed you cancelled payments, for any enquires please call <strong> 09028020900 </strong>",
            level: "info",
            timeout: 4000
        });
    };

    let handler = PaystackPop.setup({
        key: key,
        email,
        amount: 150000,
        currency: "NGN",
        firstname: fullname.split(" ")[0],
        lastname: fullname.split(" ")[1] ? fullname.split(" ")[1] : "",
        metadata: {
            custom_fields: [
                {
                    display_name: "Mobile Number",
                    variable_name: "mobile_number",
                    value: phone
                }
            ]
        },
        callback,
        onClose
    });

    handler.openIframe();
}

document.querySelector("#payBtn").addEventListener("click", e => {
    e.preventDefault();
    payWithPaystack();
});

registerForm.addEventListener("submit", e => {
    e.preventDefault();

    if (formIsInvalid()) {
        notify({
            message: "Please supply all your details before submiting",
            level: "info"
        });
        return;
    }
    sumbitForm(null);
});

// ASSEMBLY INPUT

const assemblyInput = document.querySelector("#assemblyInput");

$("#assemblyInput").select2({
    theme: "bootstrap4",
    placeholder: "Search for Your Assembly",
    minimumInputLength: 2,
    ajax: {
        delay: 300,
        url: "/assembly-data",
        method: "get",
        processResults: function(data) {
            return {
                results: data.data
            };
        }
    }
});

// let submitBtn = document.querySelector('#submitBtn')
// submitBtn.classList.add('disabled')
// submitBtn.setAttribute('disabled', true)
// submitBtn.classList.remove('disabled')
// submitBtn.removeAttribute('disabled')
