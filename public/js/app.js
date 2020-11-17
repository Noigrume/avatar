/************************************************************************
 ********************* FONCTIONS
 ************************************************************************/
function onSubmitGenerateAvatar(event)
{
    event.preventDefault();

    const formData = new FormData(event.currentTarget);

    fetch(`ajax.php?size=${encodeURIComponent(formData.get('size'))}&colors=${encodeURIComponent(formData.get('colors'))}`)
        .then(response => response.text())
        .then(onAjaxLoadGenerateAvatar);
}

function onAjaxLoadGenerateAvatar(svg)
{
    document.getElementById('avatar-container').innerHTML = svg;
    document.querySelector('input[name="svg"]').value = svg;
}

function onSubmitSaveAvatar(event)
{
    event.preventDefault();
    const formData = new FormData(event.currentTarget);
    fetch('ajax.php', {
        'method': 'POST',
        'body': formData
    })
        .then(response => response.text())
        .then(onAjaxLoadSaveAvatar);
}

function onAjaxLoadSaveAvatar(filename)
{
    let paragraph = document.querySelector('.save-avatar-result');
    if (paragraph === null) {
        paragraph = document.createElement('p');
        paragraph.classList.add('save-avatar-result');
    }
    paragraph.innerHTML = `Avatar enregistré dans le fichier <b>${filename}</b>`;
    document.querySelector('main').appendChild(paragraph);
}


/************************************************************************
 ********************* CODE PRINCIPAL
 ************************************************************************/
const sizeInputElement = document.getElementById('size-input');
const sizeOutputElement = document.getElementById('size-ouput');
const colorsInputElement = document.getElementById('colors-input');
const colorsOutputElement = document.getElementById('colors-output');

sizeInputElement.addEventListener('input', () => {
    sizeOutputElement.value = sizeInputElement.value;
});
sizeOutputElement.value = sizeInputElement.value;

colorsInputElement.addEventListener('input', () => {
    colorsOutputElement.value = colorsInputElement.value;
});
colorsOutputElement.value = colorsInputElement.value;

document.getElementById('generate-avatar-form').addEventListener('submit', onSubmitGenerateAvatar);
document.getElementById('save-avatar-form').addEventListener('submit', onSubmitSaveAvatar);

