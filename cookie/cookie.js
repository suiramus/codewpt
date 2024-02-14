
/* Cookie Banner */

function createCookieBanner() {
    const options = {
        cookieName: 'cookie-accepted-wpt',
        cookieExpireDays: 365 * 3, // Days * Years
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

    // Check if cookie is set
    const cookies = document.cookie.split(';');
    const cookieExists = cookies.some(cookie => cookie.trim().startsWith(cookieName + '='));

    if (!cookieExists) {
        // Create cookie banner HTML
        const cookieWrap = document.createElement('div');
        cookieWrap.className = 'cookie-wrap';
        cookieWrap.innerHTML = `
            <div class="cookie-text">${cookieTextHtml}</div>
            <div class="cookie-button">${cookieButtonText}</div>
        `;

        // Append HTML to body
        document.body.appendChild(cookieWrap);

        // Add click event listener to cookie button
        const cookieButton = cookieWrap.querySelector('.cookie-button');
        cookieButton.addEventListener('click', function () {
            // Calculate cookie expiration date
            const expireDate = new Date();
            expireDate.setDate(expireDate.getDate() + cookieExpireDays);
            // Set cookie
            document.cookie = `${cookieName}=1; expires=${expireDate.toUTCString()}; path=/`;
            // Hide cookie banner
            cookieWrap.style.display = "none";
        });
    }
}

// Call the function when the page loads
window.addEventListener('load', createCookieBanner);

// ===========================================