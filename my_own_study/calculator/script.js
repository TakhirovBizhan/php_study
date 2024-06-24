const buttonColection = document.getElementsByClassName('butt');
const screen = document.getElementById('output');
const cleanBtn = document.getElementById('clean');
const countBtn = document.getElementById('count');

// функция очистки
const cleanFun = () => {
    screen.value = '';
}

// функция подсчета
const countFun = () => {
    if (screen.value == '') {
        alert('Введите данные!')
    }
    else {
        const data = screen.value;
        fetch('calculator.php', {
            method: 'POST',
            body: data
        })
            .then(response => response.text())
            .then(data => console.log('Success:', data))
            .catch(error => console.error('Error:', error));
    }
}


Array.from(buttonColection).forEach((button) => {
    button.addEventListener('click', () => {
        screen.value += button.textContent;
    })
})

cleanBtn.addEventListener('click', cleanFun)
countBtn.addEventListener('click', countFun)