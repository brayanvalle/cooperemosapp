const toolTipOptions = {
  news: {
    tooltips: [
      {
        placement: "right",
        element: "#navbar_news",
        title: "Noticias",
        message: "Aquí podrás ver las noticias, da click para conocer más",
        isNavbarElement: true,
      },
      {
        element: ".post_like_btn_0",
        placement: "right",
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
        placement: "right",
        message: "Podrás compartir las publicaciones como un link externo",
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
        placement: "right",
        message: "Aquí podrás ver tu red",
        isNavbarElement: true,
      },
      {
        element: "#myNetwork_subscribe_btn_0",
        title: "Subscribete",
        placement: "bottom",
        message: "Aquí podrás subscribirte a las publicaciones que compartan otros usuarios.",
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
        placement: "bottom",
        cssClass: "tooltip-plugin-top",
        element: "#navbar_plugins",
        title: "Plugins",
        message: "Aquí podrás ver las extensiones que tenemos para ti.",
        isNavbarElement: true,
      },
      {
        placement: "bottom",
        element: "#plugins_activities_btn",
        title: "Actividades",
        message: "Aquí verás diferentes actividades y juegos",
        next: {
          type: "plugins",
          position: 2,
        },
      },
      {
        placement: "bottom",
        element: "#plugins_myMovilities_btn",
        title: "Mis movilidades",
        message: "Aquí puedes ver el historial de tus movilidades",
        next: {
          type: "plugins",
          position: 3,
        },
      },
      {
        placement: "bottom",
        element: "#plugins_recomendations_btn",
        title: "Convenios y Redes",
        message: "Aquí puedes ver el listado de Convenios y Redes.",
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
        cssClass: "tooltip-myProfile-top",
        placement: "bottom",
        element: "#navbar_myProfile",
        title: "Mi perfil",
        message: "Aquí podrás ver tu perfil",
        isNavbarElement: true
      },
      {
          placement: "bottom",
          element: "#userProfileCard",
          title: "Mi perfil",
          message: "En esta sección se encuentra toda tu información personal.",
          next: {
            type: "help",
            position: 0,
        }
      },
    ],
  },
  help: {
    tooltips: [
      {
        placement: "left",
        element: "#navbar_help",
        title: "Ayuda",
        message: "En caso de que necesites ayuda, ingresa a esta sección.",
        isNavbarElement: true,
      },
    ],
  },
};

class Tooltip {
  constructor() {
    $(".popover").remove();
    this.isTooltipActive = $("#SHOW_TOOLTIP").val() === "TRUE";
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
  }

  setTooltipConfig() {
    $(this.currentTooltip.element).attr("data-toggle", "popover");
    $(this.currentTooltip.element).attr(
      "data-placement",
      this.currentTooltip.placement
    );
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
    $("body").css("overflow", "hidden");
    if (this.currentTooltip.isNavbarElement) {
      this.blurOnTutorial();
    }

    if (this.currentTooltip.cssClass) {
      $(".popover").addClass(this.currentTooltip.cssClass);
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
