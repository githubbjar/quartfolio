/**
 * Alpine testimonial carousel component
 */
document.addEventListener('alpine:init', () => {
  Alpine.data('carousel', () => ({
    active: 0,
    autorotate: false,
    autorotateTiming: 7000,

    items: [
      {
        quote:
          "“Iʼve worked with Jerry for years. My go-to-description for him is ‘brilliant.ʼ He has a knack for capturing the gist of an article, or even an entire issue, and illustrating everything in a way that is eye-catching, thought-provoking, and occasionally accented with a just-right touch of laugh-out-loud humor. Heʼs also great to work with. Highly recommended.”",
        name: "Terrell Clemmons",
        role: "Editor at",
        team: "Salvo",
        link: "#0",
      },
      {
        quote:
          "“An experienced designer in print and web formats, Jerry easily adapts his superb creativity to the wide range of graphic projects we give him. And he always gets the technical requirements right. Jerry is not just talented but also a pleasure to work with.”",
        name: "Richard Vaughan",
        role: "President at",
        team: "Publishing Management Associates",
        link: "#0",
      },
    ],

    init() {
      if (this.autorotate) {
        this.autorotateInterval = setInterval(() => {
          this.active =
            this.active + 1 === this.items.length ? 0 : this.active + 1
        }, this.autorotateTiming)
      }

      this.$watch('active', () => this.heightFix())

      // If AOS is used inside testimonials
      if (window.refreshAOS) window.refreshAOS()
    },

    stopAutorotate() {
      clearInterval(this.autorotateInterval)
      this.autorotateInterval = null
    },

    heightFix() {
      this.$nextTick(() => {
        const target = this.$refs.testimonials?.children?.[this.active + 1]
        if (!target) return

        this.$refs.testimonials.style.height =
          target.offsetHeight + 'px'
      })
    },
  }))
})
