import AppForm from "../app-components/Form/AppForm";

Vue.component("post-form", {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title: this.getLocalizedFormDefaults(),
                location: this.getLocalizedFormDefaults(),
                body: this.getLocalizedFormDefaults(),
                published_at: "",
                enabled: false,
                popularity: "",
                category_id: "",
                author_id: "",
                tags_id: ""
            },
            mediaCollections: ["cover", "gallery", "pdf"]
        };
    }
});
