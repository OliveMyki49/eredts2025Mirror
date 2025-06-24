function yesterday() {
    // return current date with the following format:
    // Tue Feb 28 2023 17:27:46 GMT+0800 (Taipei Standard Time)
    const yesterday = new Date(); //this is current date
    yesterday.setDate(yesterday.getDate() - 1); //this will set it as yesterday
    return yesterday;
}
