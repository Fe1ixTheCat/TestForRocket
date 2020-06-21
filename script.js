function paginationUp() {
  let dots = document.getElementById('pagination-up');
  let hiddenItems = document.getElementsByClassName('pagination__hidden-up');
  dots.remove();
  for (let i = 0; i < hiddenItems.length; i++) {
    hiddenItems[i].style.display = "block";
  }
}
function paginationBottom() {
  let dots = document.getElementById('pagination-bottom');
  let hiddenItems = document.getElementsByClassName('pagination__hidden-bottom');
  dots.remove();
  for (let i = 0; i < hiddenItems.length; i++) {
    hiddenItems[i].style.display = "block";
  }
}
