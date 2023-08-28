function genererAvatar() {
    var nomUtilisateur = document.getElementById('username').value.trim();
    var initials = extractInitials(nomUtilisateur);
    var backgroundColor = generateColor(nomUtilisateur);
    var textColor = getContrastColor(backgroundColor);

    var avatarElement = document.createElement('div');
    avatarElement.classList.add('avatar');
    avatarElement.style.backgroundColor = backgroundColor;
    avatarElement.style.color = textColor;
    avatarElement.innerText = initials;

    document.getElementById('logout-btn').innerHTML = '';
    document.getElementById('login-btn').appendChild(avatarElement);
}

function extractInitials(nom) {
    var initials = '';
    var words = nom.split(' ');

    for (var i = 0; i < words.length; i++) {
        if (words[i].length > 0) {
            initials += words[i][0].toUpperCase();
        }
    }

    return initials;
}

function generateColor(nom) {
    // Génère un hachage unique à partir du nom d'utilisateur
    var hash = 0;
    for (var i = 0; i < nom.length; i++) {
        hash = nom.charCodeAt(i) + ((hash << 5) - hash);
    }

    // Convertit le hachage en une couleur RVB
    var color = (hash & 0x00FFFFFF).toString(16).toUpperCase();

    // Remplit éventuellement les zéros à gauche
    while (color.length < 6) {
        color = '0' + color;
    }

    return '#' + color;
}

function getContrastColor(backgroundColor) {
    // Calcule la couleur de contraste en fonction du fond
    // Retourne 'black' ou 'white' en fonction de la luminosité du fond
    var r = parseInt(backgroundColor.substr(1, 2), 16);
    var g = parseInt(backgroundColor.substr(3, 2), 16);
    var b = parseInt(backgroundColor.substr(5, 2), 16);

    var brightness = (r * 299 + g * 587 + b * 114) / 1000;

    return brightness > 128 ? 'black' : 'white';
}