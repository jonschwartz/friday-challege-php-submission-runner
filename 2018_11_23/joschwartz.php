<?php

return function ($num) {
  return (int)gmp_fact($num);
};