import axios from 'axios'

let notification = document.querySelector('#notification')
let submitBtn = document.querySelector('#submitBtn')
const registerForm = document.forms['register-form']
let paid = false

const sumbitForm = ref => {
    let form = new FormData(document.querySelector('#register-form'))

    if (ref) {
        form.append('transaction_ref', ref)
    }

    axios
        .post('/register', form, {
            headers: {
                'Content-type': 'multipart/form-data'
            }
        })
        .then(({ data: { message, level } }) => {
            notify({
                message,
                level,
                timeout: 4000
            })
        })
}

function callback(response) {
    if (response.status != 'success') {
        return handlefailedPayment(response)
    }
    return handleSuccessfulPayment(response)
}

const notify = ({ message, level = 'info', timeout = 2000 }) => {
    notification.innerHTML = ''
    notification.classList.remove(`alert-${level}`)

    notification.classList.add(`alert-${level}`)
    notification.innerHTML = message
    notification.classList.remove(`d-none`)

    setTimeout(() => {
        notification.classList.add(`d-none`)
        notification.classList.remove(`alert-${level}`)
        notification.innerHTML = ''
    }, timeout)
}

const handleSuccessfulPayment = response => {
    paid = true
    notify({
        message: 'You have successfuly paid for your registrations,<strong> we are almost done </strong> saving your details',
        level: 'success',
        timeout: 2000
    })

    sumbitForm(response.trxref)
}

const handlefailedPayment = response => {
    notify({
        message: `You payment failed with the following reason: <em>${
            response.message
        }</em>, for any enquires please call <strong> 09028020900</strong>, you may submit your details now and retry payment at another time`,

        level: 'danger',
        timeout: 3000
    })
    submitBtn.classList.remove('disabled')
    submitBtn.removeAttribute('disabled')
}

const formIsInvalid = () => {
    let form = new FormData(registerForm)
    let fields = ['fullname', 'phone', 'email', 'address', 'assembly', 'gender', 'age']
    let values = fields.map(field => form.get(field))

    return values.some(val => val === '')
}

function payWithPaystack() {
    if (formIsInvalid()) {
        notify({ message: 'Please supply all your details before making payments', level: 'info' })

        return
    }
    let form = document.forms['register-form']
    let email, fullname, phone
    email = form.elements.email.value
    fullname = form.elements.fullname.value
    phone = form.elements.phone.value

    submitBtn.classList.add('disabled')
    submitBtn.setAttribute('disabled', true)

    const onClose = () => {
        notify({ message: 'we noticed you cancelled payments, for any enquires please call <strong> 09028020900 </strong>', level: 'info', timeout: 4000 })
        submitBtn.classList.remove('disabled')
        submitBtn.removeAttribute('disabled')
    }

    let handler = PaystackPop.setup({
        key: 'pk_test_b021c3d2eb776aecae070ff04d9d7af7e2cea1bb',
        email,
        amount: 150000,
        currency: 'NGN',
        firstname: fullname.split(' ')[0],
        lastname: fullname.split(' ')[1] ? fullname.split(' ')[1] : '',
        metadata: {
            custom_fields: [
                {
                    display_name: 'Mobile Number',
                    variable_name: 'mobile_number',
                    value: phone
                }
            ]
        },
        callback,
        onClose
    })

    handler.openIframe()
}

document.querySelector('#payBtn').addEventListener('click', e => {
    e.preventDefault()
    payWithPaystack()
})

registerForm.addEventListener('submit', e => {
    e.preventDefault()

    if (formIsInvalid()) {
        notify({ message: 'Please supply all your details before submiting', level: 'info' })

        return
    }
    sumbitForm(null)
})

// ASSEMBLY INPUT

const assemblyInput = document.querySelector('#assemblyInput')

$('#assemblyInput').select2({
    theme: 'bootstrap4',
    placeholder: 'Search for Your Assembly',
    minimumInputLength: 2,
    ajax: {
        delay: 300,
        url: '/assembly-data',
        method: 'get',
        processResults: function(data) {
            return {
                results: data.data
            }
        }
    }
})