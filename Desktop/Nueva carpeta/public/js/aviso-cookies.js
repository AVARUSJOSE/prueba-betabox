const botonAceptarCookies = document.getElementById('btn-aceptar-cookies');
const avisoCookies = document.getElementById('aviso-cookies');
const fondoAvisoCookies = document.getElementById('fondo-aviso-cookies');

dataLayer = [];
alert('hola');
if (!localStorage.getItem('cookies-aceptadas')) {
	alert('hola');
	avisoCookies.style.display = 'block';
	fondoAvisoCookies.style.display = 'flex';
} else {
	avisoCookies.style.display = 'none';
	fondoAvisoCookies.style.display = 'none';
	dataLayer.push({ 'event': 'cookies-aceptadas' });
}

botonAceptarCookies.addEventListener('click', () => {
	avisoCookies.style.display = 'none';
	fondoAvisoCookies.style.display = 'none';

	localStorage.setItem('cookies-aceptadas', true);

	dataLayer.push({ 'event': 'cookies-aceptadas' });
});