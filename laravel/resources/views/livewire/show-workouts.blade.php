<div
    x-data="{
        observe () {
            let observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        @this.call('loadMore')
                    }
                })
            }, {
                root: null
            })

            observer.observe(this.$el)
        }
    }"
    x-init="observe"
>
    @dump($this->routes)
</div>
