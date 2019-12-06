var offer1 = document.getElementById('offer1');
var offer2 = document.getElementById('offer2');
var offer3 = document.getElementById('offer3');

var modalAdvertisement = document.getElementById('modalAdvertisement');

var modalOffer1 = document.getElementById('modalOffer1');
var modalOffer2 = document.getElementById('modalOffer2');
var modalOffer3 = document.getElementById('modalOffer3');

var btnModalClose1 = document.getElementById('modalClose1');
var btnModalClose2 = document.getElementById('modalClose2');
var btnModalClose3 = document.getElementById('modalClose3');

offer1.onclick = function() {
  modalAdvertisement.style.display = 'block';
  modalOffer1.style.display = 'block';
}
offer2.onclick = function() {
  modalAdvertisement.style.display = 'block';
  modalOffer2.style.display = 'block';
}
offer3.onclick = function() {
  modalAdvertisement.style.display = 'block';
  modalOffer3.style.display = 'block';
}

btnModalClose1.onclick = function() {
  modalAdvertisement.style.display = 'none';
  modalOffer1.style.display = 'none';
}
btnModalClose2.onclick = function() {
  modalAdvertisement.style.display = 'none';
  modalOffer2.style.display = 'none';
}
btnModalClose3.onclick = function() {
  modalAdvertisement.style.display = 'none';
  modalOffer3.style.display = 'none';
}

window.onclick = function(event) {
  if (event.target == modalAdvertisement) {
    modalAdvertisement.style.display = 'none';
    modalOffer1.style.display = 'none';
    modalOffer2.style.display = 'none';
    modalOffer3.style.display = 'none';
  }
}