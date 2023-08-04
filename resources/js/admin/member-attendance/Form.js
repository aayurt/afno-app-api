import AppForm from "../app-components/Form/AppForm";

Vue.component("member-attendance-form", {
    mixins: [AppForm],
    props: ["members"],

    data: function() {
        return {
            form: {
                date: "",
                clock_in: "",
                clock_out: "",
                early: "",
                must_cin: false,
                must_cout: false,
                att_time: "",
                member_id: ""
            }
        };
    }
});
