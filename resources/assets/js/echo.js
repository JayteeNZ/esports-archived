
import Bus from './bus.js';


Echo.join('chat')
	.listen('Comments.MatchCommentCreated', (e) => {
		Bus.$emit('message.added', e.message);
	});

