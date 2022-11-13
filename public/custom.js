let requiredField = (e) => {

    let val = e.target.value

    let elm = document.getElementById(e.target.id)

    removeValidationMsg(elm)
    if (!val.length) {

        addValidationMsg(elm)
    }
}

let addValidationMsg = (elm, msg = 0) => {

    let err = [
        'This field is required.',
        'Invalid Email Address.',
        'Password and Confirm Password do not match.',
        'Please Select Profile Picture'
    ];

    if (!elm.classList.contains('is-invalid')) {

        elm.classList.add('is-invalid')
    }

    if (!elm.nextElementSibling) {

        elm.insertAdjacentHTML('afterend', `<div class="invalid-feedback d-block fw-bold">${err[msg]}</div>`)
    }
    elm.focus()
}

let removeValidationMsg = (elm) => {

    if (elm.classList.contains('is-invalid')) {

        elm.classList.remove('is-invalid')
    }

    if (elm.nextElementSibling) {

        elm.nextElementSibling.remove()
    }
}

let validateAddUserForm = () => {

    let name = document.getElementById('name')
    let email = document.getElementById('email')
    let password = document.getElementById('password')
    let password_confirmation = document.getElementById('password_confirmation')
    let profile_picture = document.getElementById('profile_picture')

    removeValidationMsg(name)
    removeValidationMsg(email)
    removeValidationMsg(password)
    removeValidationMsg(password_confirmation)
    removeValidationMsg(profile_picture)

    if (!name.value.length) {

        addValidationMsg(name)
        return false
    }
    if (!email.value.length) {

        addValidationMsg(email)
        return false
    }
    if (email.value.length) {

        let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if (!email.value.match(regex)) {

            addValidationMsg(email, 1)
            return false
        }
    }
    if (!password.value.length) {

        addValidationMsg(password)
        return false
    }
    if (!password_confirmation.value.length) {

        addValidationMsg(password_confirmation)
        return false
    }
    if (password.value.length && password_confirmation.value.length) {

        if (password.value !== password_confirmation.value) {

            addValidationMsg(password, 2)
            return false
        }
    }
    if (!profile_picture.files?.length) {

        addValidationMsg(profile_picture, 3)
        return false
    }
    return true
}

let validateUpdateUserForm = () => {

    let name = document.getElementById('name')
    let password = document.getElementById('password')
    let password_confirmation = document.getElementById('password_confirmation')

    removeValidationMsg(name)
    removeValidationMsg(password)
    removeValidationMsg(password_confirmation)

    if (!name.value.length) {

        addValidationMsg(name)
        return false
    }
    if (password.value.length) {

        if (!password_confirmation.value.length) {

            addValidationMsg(password_confirmation)
            return false
        }
    }
    if (password_confirmation.value.length) {

        if (!password.value.length) {

            addValidationMsg(password)
            return false
        }
    }
    if (password.value.length && password_confirmation.value.length) {

        if (password.value !== password_confirmation.value) {

            addValidationMsg(password, 2)
            return false
        }
    }
}

let validateSearchUserForm = () => {

    let search_input = document.getElementById('search_input')

    if (!search_input.value.length) {

        addValidationMsg(search_input)
        return false
    }
    return true
}
