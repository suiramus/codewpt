function createCookieBanner() {
    const options = {
        cookieName: 'cookie-consent',
        cookieExpireDays: 365*2,
        cookieTextHtml: `
			<p>
				Folosim cookies pentru a îmbunătăți experiența dvs. Continuând navigarea pe acest site, 
				sunteți de acord cu <a href="/termeni-si-conditii/" title="Termeni și condiții de utilizare a site-ului">Termenii și Condițiile</a> și cu folosirea cookie-urilor. 
				Vezi <a href="/cookies/" title="Cookie Info">Politica privind cookies.</a>
			</p>
		`,
        cookieButtonText: 'De acord! &nbsp; Închide',
    };

    const cookieName = options.cookieName;
    const cookieExpireDays = options.cookieExpireDays;
    const cookieTextHtml = options.cookieTextHtml;
    const cookieButtonText = options.cookieButtonText;

    // Verificăm dacă cookie-ul de consimțământ există
    const cookies = document.cookie.split(';');
    const cookieExists = cookies.some(cookie => cookie.trim().startsWith(cookieName + '='));

    if (!cookieExists) {
        // Cream HTML-ul banner-ului de cookie
        const cookieWrap = document.createElement('div');
        cookieWrap.className = 'cookie-wrap';
        cookieWrap.innerHTML = `
            <div class="cookie-text">${cookieTextHtml}</div>
            <div class="cookie-button">${cookieButtonText}</div>
        `;

        // Adăugăm HTML-ul în corpul paginii
        document.body.appendChild(cookieWrap);

        // Adăugăm un ascultător de evenimente de clic pentru butonul cookie
        const cookieButton = cookieWrap.querySelector('.cookie-button');
        cookieButton.addEventListener('click', function () {
            // Calculăm data de expirare a cookie-ului
            const expireDate = new Date();
            expireDate.setDate(expireDate.getDate() + cookieExpireDays);
            // Setăm cookie-ul
            document.cookie = `${cookieName}=1; expires=${expireDate.toUTCString()}; path=/`;
            // Ascundem banner-ul de cookie
            cookieWrap.style.display = "none";
            // Facem refresh la pagină pentru a actualiza lista de cookie-uri
            window.location.reload();
        });
    }
}

// Apelăm funcția când pagina este încărcată
window.addEventListener('load', createCookieBanner);
