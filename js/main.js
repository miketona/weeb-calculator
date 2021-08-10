function isChecked(formName, checkBoxID) {
  console.log(checkBoxID);
  console.log(formName);
  var checkBox = document.getElementById(checkBoxID);
  console.log(checkBox);
  if (checkBox.checked == true) {
    document.getElementById(formName).classList.remove("hide");
    setTimeout(() => {
      document.querySelector(`#${formName} .displayAnimeCheckbox`).click();
    }, 300);
    window.scroll(0, 500);
  } else {
    document.getElementById(formName).classList.add("hide");
    document.querySelector(`#${formName} .displayAnimeCheckbox`).click();
  }
}

//paralax loading
document.addEventListener("DOMContentLoaded", function () {
  var elems = document.querySelectorAll(".parallax");
  var instances = M.Parallax.init(elems, 0);
});

//random anime quote generator
document.querySelectorAll(".randomAnimeQuote").forEach((p) => {
  fetch("https://animechan.vercel.app/api/random")
    .then((response) => response.json())
    .then(
      (anime) =>
        (p.innerHTML = `"${anime.quote}" - ${anime.character} (${anime.anime})`)
    );
});
