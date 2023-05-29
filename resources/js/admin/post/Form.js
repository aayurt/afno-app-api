import AppForm from "../app-components/Form/AppForm";

Vue.component("post-form", {
    mixins: [AppForm],
    props: ["availableTags", "authors", "categories"],
    data: function() {
        var moment = require("moment");
        var now = moment().format("YYYY-MM-DD HH:mm:ss");
        return {
            form: {
                title: this.getLocalizedFormDefaults(),
                location: this.getLocalizedFormDefaults(),
                body: this.getLocalizedFormDefaults(),
                sub_title: this.getLocalizedFormDefaults(),
                published_at: now,
                enabled: false,
                popularity: 0,
                category_id: "",
                author_id: "",
                // tags_id: "",
                tags: ""
            },
            mediaCollections: ["cover", "gallery", "pdf"]
        };
    }
});
