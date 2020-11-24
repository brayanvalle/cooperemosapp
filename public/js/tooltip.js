const toolTipOptions = {
  news: {
    element: "#navbar_news",
    title: "Noticias",
    message: "Aquí podrás ver las noticias, da click para conocer más",
    tooltips: [
      {
        element: "#btn_like",
        message: "Podrás dar me gusta a las publicaciones que más te interesen",
      },
      {
        element: "#post_share_btn",
        message: "Podrás compartir las publicaciones con las personas",
      },
    ],
  },
  myNetwork: {
    element: "#navbar_myNetwork",
    title: "Mi red",
    message: "Aquí verás tu red",
    tooltips: [
      {
        element: "#btn_subscribe",
        message: "Acá puedes suscribirte",
      },
    ],
  },
};

class Tooltip {
  showTooltip(obj) {
    $(obj.element).attr("data-toggle", "popover");
    $(obj.element).attr("data-content", obj.message);
    $(obj.element).attr("title", obj.title);
    $(obj.element).popover("show");
    $(obj.element).css({ backgroundColor: "#f7ffc4" });
  }

  blurOnTutorial() {
    $("#blur_body").css({
      backgroundColor: "#01223770",
      backdropFilter: "blur(5px)",
      visibility: "visible",
    });
    $("#btn_navbar").css({ "z-index": "1" });
  }
}

$(document).ready(function () {
  $("#btn_tutorial").click(function () {
    const tooltip = new Tooltip();
    tooltip.showTooltip(toolTipOptions.news);

    const bodyblur = new Tooltip();
    bodyblur.blurOnTutorial();
  });
});
