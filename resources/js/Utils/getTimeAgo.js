const getTimeAgo = (date) => {
    const currentTime = new Date();
    const diffInMilliseconds = currentTime - new Date(date);
    const diffInSeconds = Math.floor(diffInMilliseconds / 1000);
    let timeAgo;

    if (diffInSeconds < 60) {
        timeAgo = `${diffInSeconds} seconds ago`;
    } else if (diffInSeconds < 3600) {
        const diffInMinutes = Math.floor(diffInSeconds / 60);
        timeAgo = `${diffInMinutes} minutes ago`;
    } else if (diffInSeconds < 86400) {
        const diffInHours = Math.floor(diffInSeconds / 3600);
        timeAgo = `${diffInHours} hours ago`;
    } else if (diffInSeconds < 604800) {
        const diffInDays = Math.floor(diffInSeconds / 86400);
        timeAgo = `${diffInDays} days ago`;
    } else {
        const diffInWeeks = Math.floor(diffInSeconds / 604800);
        timeAgo = `${diffInWeeks} weeks ago`;
    }

    return timeAgo;
};

export default getTimeAgo;