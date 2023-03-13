function editGenre(genreId) {
  window.location = 'index.php?menu=genre_update&gid=' + genreId;
}
function deleteGenre(genreId) {
  const confirmation = window.confirm('Are you sure want to delete this data?');
  if (confirmation) {
    window.location = 'index.php?menu=genre&cmd=del&gid=' + genreId;
  }
}
