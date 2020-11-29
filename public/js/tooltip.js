const toolTipOptions = {
  news: {
    tooltips: [
      {
        element: "#navbar_news",
        title: "Noticias",
        message: "Aquí podrás ver las noticias, da click para conocer más",
        isNavbarElement : true,
      },
      {
        element: ".post_like_btn_0",
        title: "Me gusta",
        message: "Podrás dar me gusta a las publicaciones que más te interesen",
        next: {
          type: "news",
          position: 2,
        },
      },
      {
        element: "#post_share_btn_0",
        title: "Compartir",
        message: "Podrás compartir las publicaciones con las personas",
        next: {
          type: "myNetwork",
          position: 0,
        },
      },
    ],
  },
  myNetwork: {
    tooltips: [
      {
        element: "#navbar_myNetwork",
        title: "Mi red",
        message: "Aquí podrás ver tu red",
        isNavbarElement : true,
      },
      {
        element: "#myNetwork_subscribe_btn_0",
        title: "Subscribete",
        message: "Aquí podrás subscribirte",
        next: {
          type: "plugins",
          position: 0,
        },
      },
    ],
  },
  plugins: {
    tooltips: [
      {
        element: "#navbar_plugins",
        title: "Plugins",
        message: "Aquí podrás ver todas las actividades",
        isNavbarElement : true,
      },
      {
        element: "#plugins_activities_btn",
        title: "Actividades",
        message: "Aquí verás diferentes actividades y juegos",
        next: {
          type: "plugins",
          position: 2,
        },
      },
      {
        element: "#plugins_myMovilities_btn",
        title: "Mis movilidades",
        message: "Acá puedes ver tus movilidades",
        next: {
          type: "plugins",
          position: 3,
        },
      },
      {
        element: "#plugins_recomendations_btn",
        title: "Recomendaciones",
        message: "Acá puedes ver tus recomendaciones",
        next: {
          type: "myProfile",
          position: 0,
        },
      },
    ],
  },
  myProfile: {
    tooltips: [
      {
        element: "#navbar_myProfile",
        title: "Mi perfil",
        message: "Aquí podrás ver tu perfil",
        isNavbarElement : true,
      },
    ],
  },
};

class Tooltip {
  constructor() {
    $(".popover").remove();
    this.isTooltipActive = $("#SHOW_TOOLTIP").val() === "True";
    this.currentTooltip = {};
    this.nextElement = {};
  }

  showDefault() {
    this.blurOnTutorial();
    this.show({ type: "news", position: 0 });
  }
  /**
   * Get tooltip from options
   * @param {*} params { type: 'news' | 'myNetwork' | 'plugins' , position: numeric }
   */
  getTooltipFromOptions(params) {
    return toolTipOptions[params.type].tooltips[params.position];
  }

  /**
   * Show the tooltip
   * @param {*} params { type: 'news' | 'myNetwork' | 'plugins' , position: numeric }
   */
  show(params) {
    if (!this.isTooltipActive) {
      return;
    }

    const tooltip = this.getTooltipFromOptions(params);
    this.currentTooltip = tooltip;
    this.setTooltipConfig();
    $("body").css("overflow", "hidden");

  }

  setTooltipConfig() {
    $(this.currentTooltip.element).attr("data-toggle", "popover");
    $(this.currentTooltip.element).attr("title", this.currentTooltip.title);
    $(this.currentTooltip.element).attr(
      "data-content",
      this.currentTooltip.message
    );
    $(this.currentTooltip.element).popover("show");
    $(this.currentTooltip.element).css({ backgroundColor: "#f7ffc4" });

    if (this.currentTooltip.next) {
      $(".popover-body").append(
        `<button class="btn btn-primary btn_next_tutorial" 
        data-type="${this.currentTooltip.next.type}" data-position=${this.currentTooltip.next.position}
        >Siguiente</button>`
      );
    }
  }
  blurOnTutorial() {
    $("#blur_body").css({
      backgroundColor: "#01223770",
      backdropFilter: "blur(5px)",
      visibility: "visible",
      zIndex: "1",
    });
    $("#btn_navbar").css({ "z-index": "1" });
  }
}

$(document).on("click", ".btn_next_tutorial", function () {
  const type = $(this).attr("data-type");
  const position = parseInt($(this).attr("data-position"));
  new Tooltip().show({ type, position });
});
