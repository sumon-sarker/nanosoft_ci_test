var pagin   = document.querySelector('li.active');
var nodeA   = document.createElement('a');
if (pagin) {
  var nodeTxt = document.createTextNode(pagin.innerHTML);
  nodeA.appendChild(nodeTxt);
  nodeA.href = '#';
  nodeA.setAttribute('onclick','return false');
  pagin.innerHTML = '';
  pagin.appendChild(nodeA);
}
