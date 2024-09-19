import { formatDistanceToNow, parseISO } from 'date-fns';
import { ru } from 'date-fns/locale';

export function truncateContent(content: string, maxLength = 200) {
	if (content.length <= maxLength) {
	  return content;
	}
	return content.slice(0, maxLength).trim() + '...';
  }

export function formatRelativeTime(dateString: string) {
    const date = parseISO(dateString);
    return formatDistanceToNow(date, { addSuffix: true, locale: ru });
  }
  