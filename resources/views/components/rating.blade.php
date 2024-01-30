<div class="mt-6">
  <h3 class="text-2xl font-bold mb-4">Évaluez ce Monstre</h3>
  <form action="{{ 
        route('monsters.rate', [
          'monsterId' => $monster->id,    
        ]) }}" method="POST">
      @csrf
      <div id="rating-section" class="flex items-center">
          @for ($i = 1; $i <= 5; $i++)
              <button type="submit" name="rating" value="{{ $i }}" class="rating-star text-5xl"
                  onmouseover="highlightStars({{ $i }})" onmouseout="resetStars()">
                  &#9733;
              </button>
          @endfor
      </div>
  </form>

</div>
<script>
  function highlightStars(value) {
      const stars = document.querySelectorAll('.rating-star');
      stars.forEach((star, index) => {
          if (index < value) {
              star.classList.add('text-yellow-500');
          } else {
              star.classList.remove('text-yellow-500');
          }
      });
  }

  function resetStars() {
      const stars = document.querySelectorAll('.rating-star');
      stars.forEach(star => {
          star.classList.remove('text-yellow-500');
      });
  }
</script>