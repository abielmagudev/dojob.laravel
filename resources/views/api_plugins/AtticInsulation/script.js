const selectMethod = {
    element: document.getElementById('selectMethod'),
    listen: function () {
        this.element.addEventListener('change', function (e) {
            alert(e.target.value)
        })
    }
}
selectMethod.listen()