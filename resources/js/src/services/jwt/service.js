const key = "id_token";

export const getToken = () => {
    return window.localStorage.getItem(key);
};

export const saveToken = token => {
    window.localStorage.setItem(key, token);
};

export const destroyToken = () => {
    window.localStorage.removeItem(key);
};

export default { getToken, saveToken, destroyToken };
