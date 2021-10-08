
const mixin = {
    data(){
        return {
            http: {
                auth: {
                    login: `${this.serverUrl}/login`,
                    register: `${this.serverUrl}/register`
                },
                note: {
                    resource: `${this.serverUrl}/notes`,
                },
            }
        }
    },
    computed: {
        compileMarkDown(){
          return this.md.render(this.note.description);
        },
        compileMarkDownTitle(){
          return this.md.render(this.note.title);
        },
        compileTags(){
          return this.note.tags.split(',').map(el => `${el.trim()}`);
        }
  },
    methods: {
        withinRangeOfTwoNumbers(number, range){
            return this.withinRange(number, range[0], range[1]);
        },
        withinRange(x, min, max) {
          return x >= min && x <= max;
        },
        calculateReadTime(wc) {
            const readingRate = 200;
            const minutes = (wc - wc % readingRate) / readingRate;
            const decimal = (wc/readingRate - minutes);
            const remainderMinutes = Math.round(decimal * .60);
            return minutes + remainderMinutes || 1;
        },
        generateBgColor(index = 0) {
          const colors = ['green-btn', 'blue-500', 'yellow-500', 'purple-500', 'blue-800', 'yellow-600', 'purple-700', 'purple-900', 'green-700', 'blue-700'];
            if(index > 0) {
                return colors[index - 1];
            }
          return colors[this.randomNumber(0,8)];
        },
        randomNumber(min, max) {
          return Math.floor(Math.random() * (max - min) + min);
        },
        async post(url, data){
          const headers = {
            "Authorization": "token",
            "Content-Type": "application/json"
          };
          return await this.axios.post(url, data, { headers });
        },
        async delete(url, data){
          const headers = {
            "Authorization": "token",
            "Content-Type": "application/json"
          };
          return await this.axios.delete(url, { headers });
        },
        async get(url){
          const headers = {
            "Authorization": "token",
            "Content-Type": "application/json"
          };
          return await this.axios.get(url, { headers });
        },
        setIcons(iconName, bool) {
            switch (iconName) {
                case 'addNote':
                    this.$store.commit('setAddNoteIcon', bool);
                    break;
                case 'deleteNote':
                    this.$store.commit('setDeleteNoteIcon', bool);
                    break;
                case 'editNote':
                    this.$store.commit('setEditNoteIcon', bool);
                    break;
                default:
                    this.$store.commit('setAddNoteIcon', false);
                    this.$store.commit('setDeleteNoteIcon', false);
                    this.$store.commit('setEditNoteIcon', false);
            }
        }
    }
};
export default mixin;
