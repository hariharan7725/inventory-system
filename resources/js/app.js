// minimal js — used for confirm delete
document.addEventListener('click', function(e){
  const t = e.target;
  if (t.matches('.confirm-delete')) {
    if (!confirm('Delete this product?')) e.preventDefault();
  }
});
