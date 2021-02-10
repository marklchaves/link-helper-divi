/** Add title attributes to image links if needed. */
function addDiviLinkTitles() {
  let elts = document.querySelectorAll(php_vars.querySelector);
  if (elts.length === 0) return;
  let eltsArr = Array.from(elts);
  eltsArr.map((elt) => {
    try {
      let parent = elt.parentElement;
      let linkTitle = parent.getAttribute("title");
      if (linkTitle === undefined || linkTitle === "") {
        let child = elt.firstElementChild;
        let imgTitle = child.getAttribute("title");
        let imgAlt = child.getAttribute("alt");
        let imgTitleOrAlt = imgTitle ? imgTitle : imgAlt;
        if (imgTitleOrAlt !== undefined && imgTitleOrAlt !== "")
          parent.setAttribute("title", imgTitleOrAlt);
      }
    } catch (e) {
      console.log('Link Helper Div did not process ' + php_vars.querySelector);
    }
  });
}
