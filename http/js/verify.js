function submitVerification() {
    let formData = new FormData();
    formData.append("session", window.localStorage.getItem("unverified_session"));
    formData.append("code", document.getElementById('code').value);
    sendReq(formData, "https://api.olmmcc.tk/verify_account", (json) => {
        if (json.success == true) {
            window.localStorage.setItem("session", window.localStorage.getItem("unverified_session"));
            window.localStorage.removeItem("unverified_session");
            window.localStorage.setItem("notification", "Success! You are now logged in.");
            window.location = "/";
        } else {
            createNotification("Something went wrong. Your code may be incorrect.");
        }
    });
}
document.getElementById('verify').addEventListener('click', submitVerification);
document.getElementById('code').addEventListener('keydown', (event) => {
    if (event.code === 'Enter') {
        submitVerification();
    }
});
