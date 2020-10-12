/** Add title attributes to image links if needed. */
function addDiviLinkTitles() {
  let elts = document.querySelectorAll(php_vars.querySelector);
  let eltsArr = Array.from(elts);
  eltsArr.map((elt) => {
    let parent = elt.parentElement;
    let linkTitle = parent.getAttribute("title");
    if (linkTitle === undefined || linkTitle === "") {
      let child = elt.firstElementChild;
      let imgTitle = child.getAttribute("title");
      let imgAlt = child.getAttribute("alt");
      let imgTitleOrAlt = imgTitle ? imgTitle : imgAlt;
      if ((imgTitleOrAlt !== undefined) && (imgTitleOrAlt !== "")) parent.setAttribute("title", imgTitleOrAlt);
    }
  });
}
