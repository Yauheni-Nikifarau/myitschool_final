const resetBtn = document.querySelector('#reset-btn');
resetBtn.addEventListener('click', function (e) {
    window.location.href = window.location.origin + window.location.pathname;
});
