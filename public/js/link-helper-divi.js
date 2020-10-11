/** Add title attributes to Divi image links if needed. */
function addDiviLinkTitles() {
  console.log('querySelector: ' + php_vars.querySelector)
  let elts = document.querySelectorAll(php_vars.querySelector);
  let eltsArr = Array.from(elts);
  eltsArr.map((elt) => {
    let parent = elt.parentElement;
    let linkTitle = parent.getAttribute("title");
    if (linkTitle === undefined || linkTitle === "") {
      let child = elt.firstElementChild;
      let imgTitle = child.getAttribute("title");
      let imgAlt = child.getAttribute("alt");
      let linkTitleOrAlt = imgTitle ? imgTitle : imgAlt;
      if ((linkTitleOrAlt !== undefined) && (linkTitleOrAlt !== "")) parent.setAttribute("title", linkTitleOrAlt);
    }
  });
}
