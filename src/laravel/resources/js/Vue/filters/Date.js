export default (value) => {
    const date = new Date(value);
    return date.toLocaleString("ja");
};
