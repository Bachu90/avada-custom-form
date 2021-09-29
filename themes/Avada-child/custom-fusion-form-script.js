window.addEventListener('DOMContentLoaded', (event) => {
    //Update specified text inputs to accept only letters
    const onlyLettersInputs = document.querySelectorAll('.only-letters-input');
    if(onlyLettersInputs?.length > 0){
        onlyLettersInputs.forEach(input => {
            input.setAttribute('pattern', '[a-zA-Z]+');
            input.setAttribute('title', 'Only letters are accepted');
        })
    }
});
