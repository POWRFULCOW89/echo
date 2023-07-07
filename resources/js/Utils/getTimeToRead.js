const getTimeToRead = (content) => {
    const wordCount = content.split(' ').length;
    const minutes = Math.ceil(wordCount / 200); // Assuming average reading speed of 200 words per minute
    return minutes;
};

export default getTimeToRead