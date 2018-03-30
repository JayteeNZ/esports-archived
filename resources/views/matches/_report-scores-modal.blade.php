<div class="modal fade" id="reportScores">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Report Scores for: #{{ $match->id }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('scores.store', [$match]) }}" method="POST" id="submit-scores">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Your score</label>
                        <input type="text" name="score" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Opponent Score:</label>
                        <input type="text" name="opposition_score" class="form-control" required>
                    </div>
                    {{ csrf_field() }}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Report Scores</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>