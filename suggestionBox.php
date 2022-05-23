<link rel="stylesheet" type="text/css" href="suggestionBox.css">
<div class="suggestionBox">
    <img src="./src/balloon.png" class="balloonImage__suggestionBox">
    <div class="actionsContainer__suggestionBox">
        <img src="./src/suggestion.png" class="iconsActions__suggestionBox" onclick="openAction__suggestionBox('suggestion')">
        <img src="./src/complaint.png" class="iconsActions__suggestionBox" onclick="openAction__suggestionBox('complaint')">
    </div>
</div>

<div class="messageBox__suggestionBox">
    <div class="titleContainer__suggestionBox">
        <img src="./src/suggestion.png" class="iconsMessage__suggestionBox" id="iconsMessage__suggestionBox">
        <h2 id="textSuggestion__suggestionBox">Sugestão</h2>
    </div>

    <div class="textContainer__suggestionBox">
        <textarea id="textarea__suggestionBox" cols="30" rows="10"></textarea>

        <span id="error_suggestionBox">O campo não pode ser vazio!</span>

        <button class="buttonSend__suggestionBox" onclick="sendSuggestion_suggestionBox(myCallback)">
            Enviar
            <div class="arrow-wrapper__suggestionBox"">
                <div class=" arrow__suggestionBox"></div>
    </div>
    </button>

</div>

<!-- close button -->
<span class="closeButton__suggestionBox" onclick="closeMessageBox__suggestionBox()">&times;</span>
</div>

<script>
    document.getElementById('textarea__suggestionBox').addEventListener('blur', function() {
        this.style.borderColor = '';
        document.getElementById('error_suggestionBox').style.display = 'none'
    });

    const closeMessageBox__suggestionBox = () => {
        fade('.messageBox__suggestionBox', '.suggestionBox')
    }

    const resetErrorMessage = () => {
        const greenColor = '#00af00'
        const redColor = '#ff0000'

        const errorLabel = document.getElementById('error_suggestionBox')

        errorLabel.style.display = 'none'
        errorLabel.style.color = redColor
    }

    const openAction__suggestionBox = (typeOfAction) => {
        resetErrorMessage()

        const title = document.getElementById('textSuggestion__suggestionBox')
        const textarea = document.getElementById('textarea__suggestionBox')
        const image = document.getElementById('iconsMessage__suggestionBox')

        if (typeOfAction === 'suggestion') {
            title.innerHTML = 'Sugestão'
            textarea.placeholder = 'Escreva sua sugestão aqui'
            image.src = './src/suggestion.png'
        } else if (typeOfAction === 'complaint') {
            title.innerHTML = 'Reclamação'
            textarea.placeholder = 'Escreva sua reclamação aqui'
            image.src = './src/complaint.png'
        }

        fade('.suggestionBox', '.messageBox__suggestionBox')
    }

    const fade = (from, to) => {
        const fromElement = document.querySelector(from);
        const toElement = document.querySelector(to)

        fromElement.style.opacity = '0';

        setTimeout(() => {
            fromElement.style.display = 'none';

            toElement.style.opacity = '1';
            toElement.style.display = 'flex';
        }, 500)

    }

    const sendSuggestion_suggestionBox = (callbackFunction) => {
        const errorLabel = document.getElementById('error_suggestionBox')
        resetErrorMessage()

        const buttonSend = document.querySelector('.buttonSend__suggestionBox')
        buttonSend.style.opacity = '0.5'
        buttonSend.disabled = true

        const textarea = document.getElementById('textarea__suggestionBox')
        const text = textarea.value

        const greenColor = '#00af00'
        const redColor = '#ff0000'

        if (text.length > 0) {
            textarea.style.borderColor = greenColor

            errorLabel.style.color = greenColor
            errorLabel.style.display = 'block'
            errorLabel.innerHTML = 'Texto enviado com sucesso!'

            setTimeout(() => {
                textarea.value = ''
                textarea.style.borderColor = ''

                buttonSend.disabled = false
                buttonSend.style.opacity = '1'

                callbackFunction({
                    text
                })
            }, 1000)

        } else {
            textarea.style.border = '1px solid ' + redColor

            errorLabel.innerHTML = 'O campo não pode ser vazio!'
            errorLabel.style.display = 'block'
            
            buttonSend.disabled = false
                buttonSend.style.opacity = '1'

        }


    }

    const myCallback = (data) => {
        console.log(data)
    }
</script>