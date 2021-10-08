import { createStore } from "vuex";
import {convertNumberToBoolean} from "../Helper";

export default createStore({
    state: {
        token: localStorage.getItem('access_token') || null,
        user: JSON.parse(localStorage.getItem('user')) || null,
        notes : [],
        note: {},
        editNote: {},
        data: {},
        filteredNotes : [],
        searchTerm : '',
        addNewNoteIcon: false,
        editNoteIcon: false,
        deleteNoteIcon: false,
        saveNoteIcon: false,
        addNotePage: false,
        editNotePage: false,
        addNewNotePage: false,
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
        setData(state, data) {
            state.data = data;
        },
        setEditNote(state, editNote) {
            state.editNote = editNote;
        },
        setAddNewNoteIcon(state, bool){
            state.addNewNoteIcon = bool;
        },
        setEditNoteIcon(state, bool) {
            state.editNoteIcon = bool;
        },
        setDeleteNoteIcon(state, bool){
            state.deleteNoteIcon = bool;
        },
        setSaveNoteIcon(state, bool){
            state.saveNoteIcon = bool;
        },
        setAllNoteIcons(state, bool){
          state.addNewNoteIcon = bool;
          state.editNoteIcon = bool;
          state.deleteNoteIcon = bool;
          state.saveNoteIcon = bool;
        },

        setAllNotePages(state, bool){
          state.addNotePage = bool;
          state.editNotePage = bool;
          state.addNewNotePage = bool;
          state.deleteNotePage = bool;
        },
        setAddNotePage(state, bool){
            state.addNotePage = bool;
        },
        setAddNewNotePage(state, bool){
            state.addNewNotePage = bool;
        },
        setEditNotePage(state, bool) {
            state.editNotePage = bool;
        },
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
        saveNote(state, note){
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
