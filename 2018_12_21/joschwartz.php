<?php
/**
 * Elephpant wants to find his team at a New Years party.
 *
 * This New Years party has tons of other elephpants at it (by weight).
 *
 * This week's challenge is to find all of Elephpant's teammates without use of phone, text, slack, etc.
 * in most time efficient way.
 *
 * Caveats:
 *  * no 2 party goers have the same name
 *  * every party goer's name starts with Elephpant-
 *  * Elephpants like to mingle, so they may not be standing
 *    next to each other and change places whenever you try
 *    to look for them (aka between runs)
 *  * No cheating and just passing back the team members (yes, that will make the test case pass)!
 *    Elephpant's team knows if they didn't actually see him at the party.
 *
 * Bonus Points:
 *  * no loops
 *  * no hand coded array traversal (eg foreach)
 *  * return who each team member is standing next to
 *    (their neighbors in the party_goers array), may
 *    have to modify the test for this one, or return
 */
test(
    function ($team, $party) {
      $found_teammates = array_map(
          function ($member) use ($party) {
            return $party[array_search($member, $party, true)];
          },
          $team
      );

      return $found_teammates;
    }
);

function test($function) {
  $team  = ['Elephpant-Kevin', 'Elephpant-Suzie', 'Elephpant-Bobby', 'Elephpant-June', 'Elephpant'];
  $party = get_party_goers();

  $found_teammates = $function($team, $party);
  $not_found = array_diff($team, $found_teammates);

  if (empty($not_found)) {
    return true;
  }

  echo 'Didn\'t find: ' . join(', ', $not_found);

  return false;
}

function get_party_goers() {

  $party_goers = [
      'Elephpant-Terrell', 'Elephpant-Bradley', 'Elephpant-Emie', 'Elephpant-Llewellyn', 'Elephpant-Earnestine',
      'Elephpant-Merl', 'Elephpant-Laverna', 'Elephpant-Ari', 'Elephpant-Faye', 'Elephpant-Lacy', 'Elephpant-Lonnie',
      'Elephpant-Heidi', 'Elephpant-Ursula', 'Elephpant-Abdul', 'Elephpant-Brenda', 'Elephpant-Kiel',
      'Elephpant-Joanie', 'Elephpant-Beth', 'Elephpant-Aileen', 'Elephpant-Jaclyn', 'Elephpant-Emmy', 'Elephpant-Lela',
      'Elephpant-Corrine', 'Elephpant-Jillian', 'Elephpant-Yessenia', 'Elephpant-Jerod', 'Elephpant-Dale',
      'Elephpant-Jordon', 'Elephpant-Dulce', 'Elephpant-Rebeka', 'Elephpant-Shawn', 'Elephpant-Delphine',
      'Elephpant-Cleve', 'Elephpant-Maxie', 'Elephpant-Maybell', 'Elephpant-Margret', 'Elephpant-Chester',
      'Elephpant-Mckenzie', 'Elephpant-Stephon', 'Elephpant-Thea', 'Elephpant-Karl', 'Elephpant-Lauriane',
      'Elephpant-Tyrique', 'Elephpant-Roxane', 'Elephpant-Esperanza', 'Elephpant-Era', 'Elephpant-Trevion',
      'Elephpant-Vince', 'Elephpant-Damien', 'Elephpant-Noah', 'Elephpant-Bart', 'Elephpant-Graciela',
      'Elephpant-Hilma', 'Elephpant-Tyshawn', 'Elephpant-Chesley', 'Elephpant-Scotty', 'Elephpant-Ocie',
      'Elephpant-Johnnie', 'Elephpant-Elody', 'Elephpant-Abby', 'Elephpant-Candice', 'Elephpant-Brooke',
      'Elephpant-Zakary', 'Elephpant-Zella', 'Elephpant-Rosamond', 'Elephpant-Maryjane', 'Elephpant-Filiberto',
      'Elephpant-Stewart', 'Elephpant-Godfrey', 'Elephpant-Karson', 'Elephpant-Mariela', 'Elephpant-Evert',
      'Elephpant-Murray', 'Elephpant-Everett', 'Elephpant-Jaden', 'Elephpant-Mozell', 'Elephpant-Kirk',
      'Elephpant-Kyleigh', 'Elephpant-Horace', 'Elephpant-Bradford', 'Elephpant-Laurie', 'Elephpant-Percy',
      'Elephpant-Dameon', 'Elephpant-Ella', 'Elephpant-Ole', 'Elephpant-Eldred', 'Elephpant-Patrick',
      'Elephpant-Chelsea', 'Elephpant-Ulises', 'Elephpant-Uriel', 'Elephpant-Brooks', 'Elephpant-Rachel',
      'Elephpant-Ryann', 'Elephpant-Vicky', 'Elephpant-Emmanuel', 'Elephpant-Beulah', 'Elephpant-Joanne',
      'Elephpant-Afton', 'Elephpant-Antonina', 'Elephpant-Jalyn', 'Elephpant-Paul', 'Elephpant-Carmelo',
      'Elephpant-Geoffrey', 'Elephpant-Rodger', 'Elephpant-Shany', 'Elephpant-Melvin', 'Elephpant-Laron',
      'Elephpant-Russell', 'Elephpant-Meagan', 'Elephpant-Euna', 'Elephpant-Novella', 'Elephpant-Shannon',
      'Elephpant-Deion', 'Elephpant-Osborne', 'Elephpant-Carmela', 'Elephpant-Arno', 'Elephpant-Verlie',
      'Elephpant-Alvera', 'Elephpant-Helga', 'Elephpant-Susana', 'Elephpant-Name', 'Elephpant-Rossie',
      'Elephpant-Tracey', 'Elephpant-Thurman', 'Elephpant-Lue', 'Elephpant-Reynold', 'Elephpant-Jeremy',
      'Elephpant-Sally', 'Elephpant-Jolie', 'Elephpant-Hershel', 'Elephpant-Grant', 'Elephpant-Herman',
      'Elephpant-Zechariah', 'Elephpant-Tito', 'Elephpant-Uriah', 'Elephpant-Drake', 'Elephpant-Andres',
      'Elephpant-Harrison', 'Elephpant-Kameron', 'Elephpant-Jamarcus', 'Elephpant-Keyshawn', 'Elephpant-Vickie',
      'Elephpant-Alayna', 'Elephpant-Monte', 'Elephpant-Jovan', 'Elephpant-Aurelio', 'Elephpant-Lura',
      'Elephpant-Georgianna', 'Elephpant-Sydnee', 'Elephpant-Dean', 'Elephpant-Ewald', 'Elephpant-Zena',
      'Elephpant-Norberto', 'Elephpant-Sylvan', 'Elephpant-Noe', 'Elephpant-Collin', 'Elephpant-Roberto',
      'Elephpant-Terrill', 'Elephpant-Maxwell', 'Elephpant-Millie', 'Elephpant-Tatyana', 'Elephpant-Bernita',
      'Elephpant-Annamae', 'Elephpant-Jadyn', 'Elephpant-Odessa', 'Elephpant-Thalia', 'Elephpant-Irma',
      'Elephpant-Bridget', 'Elephpant-Devin', 'Elephpant-Michael', 'Elephpant-Lemuel', 'Elephpant-Mina',
      'Elephpant-Jaydon', 'Elephpant-Preston', 'Elephpant-Kaden', 'Elephpant-Randal', 'Elephpant-Darion',
      'Elephpant-Kara', 'Elephpant-Jamaal', 'Elephpant-Virginia', 'Elephpant-Ernie', 'Elephpant-Stuart',
      'Elephpant-Wilburn', 'Elephpant-Rickey', 'Elephpant-Clark', 'Elephpant-Ricky', 'Elephpant-Felicita',
      'Elephpant-Angelica', 'Elephpant-Raul', 'Elephpant-Roosevelt', 'Elephpant-Verla', 'Elephpant-Maximillian',
      'Elephpant-Antonette', 'Elephpant-Ardella', 'Elephpant-Margaretta', 'Elephpant-Abbey', 'Elephpant-Jean',
      'Elephpant-Jordi', 'Elephpant-Tom', 'Elephpant-Luella', 'Elephpant-Fermin', 'Elephpant-Birdie',
      'Elephpant-Vanessa', 'Elephpant-Kyler', 'Elephpant-Yasmin', 'Elephpant-Reanna', 'Elephpant-Sam',
      'Elephpant-Otilia', 'Elephpant-Sim', 'Elephpant-Junius', 'Elephpant-Marvin', 'Elephpant-Rafael',
      'Elephpant-Mattie', 'Elephpant-Ashleigh', 'Elephpant-Corine', 'Elephpant-Josiane', 'Elephpant-Jaylen',
      'Elephpant-Viviane', 'Elephpant-Lucas', 'Elephpant-Denis', 'Elephpant-Kayley', 'Elephpant-Vita',
      'Elephpant-Aditya', 'Elephpant-Bertram', 'Elephpant-Erna', 'Elephpant-Delta', 'Elephpant-Colby',
      'Elephpant-Eveline', 'Elephpant-Kelsi', 'Elephpant-Georgiana', 'Elephpant-Paolo', 'Elephpant-Wilford',
      'Elephpant-Alek', 'Elephpant-Shana', 'Elephpant-Sheila', 'Elephpant-Melvina', 'Elephpant-Hayden',
      'Elephpant-Skyla', 'Elephpant-Beau', 'Elephpant-Genevieve', 'Elephpant-Jevon', 'Elephpant-Janiya',
      'Elephpant-Ramona', 'Elephpant-Wendell', 'Elephpant-Amelia', 'Elephpant-Jaron', 'Elephpant-Abigayle',
      'Elephpant-Justyn', 'Elephpant-Garnet', 'Elephpant-Marquise', 'Elephpant-Pierre', 'Elephpant-Carlos',
      'Elephpant-Carli', 'Elephpant-Haven', 'Elephpant-Jeffrey', 'Elephpant-Gennaro', 'Elephpant-Andreane',
      'Elephpant-Jaleel', 'Elephpant-Oscar', 'Elephpant-Velva', 'Elephpant-Alaina', 'Elephpant-Kathleen',
      'Elephpant-Edna', 'Elephpant-Durward', 'Elephpant-Orpha', 'Elephpant-Laisha', 'Elephpant-Cyril',
      'Elephpant-Evans', 'Elephpant-Allan', 'Elephpant-Olen', 'Elephpant-Judah', 'Elephpant-Flavie', 'Elephpant-Juston',
      'Elephpant-Braxton', 'Elephpant-Ali', 'Elephpant-Nya', 'Elephpant-Irwin', 'Elephpant-Jaunita', 'Elephpant-Ashlee',
      'Elephpant-Carmel', 'Elephpant-Earlene', 'Elephpant-Darwin', 'Elephpant-Brook', 'Elephpant-Mohammad',
      'Elephpant-Jodie', 'Elephpant-Laila', 'Elephpant-Brody', 'Elephpant-Ally', 'Elephpant-Bailey', 'Elephpant-Elise',
      'Elephpant-Adrain', 'Elephpant-Jimmie', 'Elephpant-Elliot', 'Elephpant-Christine', 'Elephpant-Mittie',
      'Elephpant-Maximillia', 'Elephpant-Emely', 'Elephpant-Rex', 'Elephpant-Elvie', 'Elephpant-Jennifer',
      'Elephpant-Brandi', 'Elephpant-Hilario', 'Elephpant-Gust', 'Elephpant-Claudia', 'Elephpant-Ross',
      'Elephpant-Edison', 'Elephpant-Horacio', 'Elephpant-Pauline', 'Elephpant-Fred', 'Elephpant-Oran',
      'Elephpant-Ismael', 'Elephpant-Kathryne', 'Elephpant-Elyssa', 'Elephpant-Callie', 'Elephpant-Freddie',
      'Elephpant-Tanner', 'Elephpant-Antonia', 'Elephpant-Ada', 'Elephpant-Mariah', 'Elephpant-Albina',
      'Elephpant-Aleen', 'Elephpant-Palma', 'Elephpant-Kelli', 'Elephpant-Maritza', 'Elephpant-Vinnie',
      'Elephpant-Pablo', 'Elephpant-Weston', 'Elephpant-Kaleb', 'Elephpant-Lafayette', 'Elephpant-Hosea',
      'Elephpant-Norris', 'Elephpant-Krista', 'Elephpant-Caleb', 'Elephpant-Leslie', 'Elephpant-Marcelino',
      'Elephpant-John', 'Elephpant-Jesus', 'Elephpant-Beryl', 'Elephpant-Ned', 'Elephpant-Myrtice', 'Elephpant-Jaquan',
      'Elephpant-Antwan', 'Elephpant-Meda', 'Elephpant-Esther', 'Elephpant-Regan', 'Elephpant-Jaylin',
      'Elephpant-Annette', 'Elephpant-Howard', 'Elephpant-Kimberly', 'Elephpant-Paxton', 'Elephpant-Daniela',
      'Elephpant-Effie', 'Elephpant-Rupert', 'Elephpant-Adell', 'Elephpant-Wilton', 'Elephpant-Kurt',
      'Elephpant-Destiney', 'Elephpant-Kirsten', 'Elephpant-Trever', 'Elephpant-Axel', 'Elephpant-Stephan',
      'Elephpant-Zora', 'Elephpant-Bennie', 'Elephpant-Edmond', 'Elephpant-Jerry', 'Elephpant-Vada', 'Elephpant-Isidro',
      'Elephpant-Chaim', 'Elephpant-Fredy', 'Elephpant-Tessie', 'Elephpant-Leda', 'Elephpant-Nathan',
      'Elephpant-Rhianna', 'Elephpant-Anastasia', 'Elephpant-Jena', 'Elephpant-Garett', 'Elephpant-Amanda',
      'Elephpant-Stacey', 'Elephpant-Armando', 'Elephpant-Alejandra', 'Elephpant-Emiliano', 'Elephpant-Malcolm',
      'Elephpant-Dayne', 'Elephpant-Violette', 'Elephpant-Susanna', 'Elephpant-Tiara', 'Elephpant-Johnson',
      'Elephpant-Ibrahim', 'Elephpant-Meta', 'Elephpant-Aric', 'Elephpant-Ardith', 'Elephpant-Rolando',
      'Elephpant-Marc', 'Elephpant-Payton', 'Elephpant-Sigmund', 'Elephpant-Annabell', 'Elephpant-Sheridan',
      'Elephpant-Brayan', 'Elephpant-Vicente', 'Elephpant-Rory', 'Elephpant-Alison', 'Elephpant-Rosalee',
      'Elephpant-Kaela', 'Elephpant-Velda', 'Elephpant-Koby', 'Elephpant-Kevin', 'Elephpant-Suzie', 'Elephpant-Bobby',
      'Elephpant-June', 'Elephpant'
  ];

  shuffle($party_goers);

  return $party_goers;
}