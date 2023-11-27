export const dateFormat = (dateText) => {
    const date = new Date(dateText);

    const options = {
        weekday: "short",
        month: "short",
        day: "numeric",
    };

    return new Intl.DateTimeFormat("en-US", options).format(date);
};

export const degreesFormat = (degrees) => {
    return Number(degrees - 273.15).toFixed();
};

export const truncate = (source, size) => {
    if (source == null) {
        return "";
    }

    return source.length > size ? source.slice(0, size - 1) + "…" : source;
};
