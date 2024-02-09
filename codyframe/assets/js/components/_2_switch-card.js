// File#: _2_switch-card
// Usage: codyhouse.co/license
(function() {
  var SwitchCard = function(element) {
    this.element = element;
    this.switch = this.element.getElementsByClassName('js-switch-card__switch');
    this.input = false;
    initSwitchCard(this);
  };

  function initSwitchCard(el) {
    if(el.switch.length < 1) return;
    el.input = el.switch[0].querySelector('input');
    setCardStatus(el);
    // listen to switch change event
    el.input.addEventListener('change', function(event) {
      setCardStatus(el);
    });
  };

  function setCardStatus(el) {
    // toggle the --on class when the switch status changes
    Util.toggleClass(el.element, 'switch-card--on', el.input.checked);
  };

  window.SwitchCard = SwitchCard;

  var switchCards = document.getElementsByClassName('js-switch-card');
  if(switchCards.length > 0) {
    for( var i = 0; i < switchCards.length; i++) {
			(function(i){new SwitchCard(switchCards[i]);})(i);
		}
  }
}());