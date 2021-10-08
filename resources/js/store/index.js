import { createStore } from "vuex";
import {convertNumberToBoolean} from "../Helper";

export default createStore({
    state: {
        token: localStorage.getItem('access_token') || null,
        user: JSON.parse(localStorage.getItem('user')) || null,
        notes : [],
        note: {},
        filteredNotes : [],
        searchTerm : '',
        addNoteIcon: false,
        editNoteIcon: false,
        deleteNoteIcon: false,
        addNotePage: false,
        editNotePage: false,
        deleteNotePage: false,
    },
    mutations: {
        authenticate(state, token) {
            localStorage.setItem('access_token', token);
            state.token = token;
        },
        setUser(state, user) {
            localStorage.setItem('user', JSON.stringify(user));
            state.user = user;
        },
        setSearchTerm(state, term){
            state.searchTerm = term;
            if(term.length > 0) {
                state.filteredNotes = state.notes.filter(function (note) {
                    return convertNumberToBoolean(note.title.toLowerCase().search(term)) ||
                        convertNumberToBoolean(note.description.toLowerCase().search(term)) ||
                        convertNumberToBoolean(note.tags.toLowerCase().search(term))
                });
            }else  {
                state.filteredNotes = state.notes;
            }
        },
        setAddNoteIcon(state, bool){
            state.addNoteIcon = bool;
        },
        setEditNoteIcon(state, bool) {
            state.editNoteIcon = bool;
        },
        setDeleteNoteIcon(state, bool){
            state.deleteNoteIcon = bool;
        },
        setAllNoteIcons(state, bool){
          state.addNoteIcon = bool;
          state.editNoteIcon = bool;
          state.deleteNoteIcon = bool;
        },

        setAllNotePages(state, bool){
          state.addNotePage = bool;
          state.editNotePage = bool;
          state.deleteNotePage = bool;
        },
        setAddNotePage(state, bool){
            state.addNotePage = bool;
        },
        setEditNotePage(state, bool) {
            state.editNotePage = bool;
        },
        // setDeleteNotePage(state, bool){
        //     state.deleteNotePage = bool;
        // },
        deny(state){
          localStorage.removeItem('access_token');
          localStorage.removeItem('user');
          state.token = null;
          state.user = null;
          state.notes = []
        },
        loadANote(state, note){
            state.note = note;
        },
        loadNotes(state, notes){
            state.notes = notes;
            state.filteredNotes = notes;
        },
        addNote(state, note){
            state.notes.unshift(note);
        },
        deleteANote(state, note){
            const notes = state.notes.filter(el => {
                return el.slug !== note.slug;
            });
            state.notes = notes;
            state.filteredNotes = notes;
        },
    },
    getters: {
        isAuthenticated(state) {
            return Boolean(state.token);
        },
        user(state){
            return state.user;
        }
    }
});
